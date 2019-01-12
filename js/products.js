document.addEventListener('DOMContentLoaded', function(){
    createPagination();
});

var currentPage=1;
var productsPerPage=12;
var gender = 'Todo';
var type = 'Todo';

function createPagination(){
    currentPage=1;
    var req=new XMLHttpRequest();
    req.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
        {
            var count=parseInt(this.responseText);
            var list=document.getElementById("listPag");
            for(var i=0;i<Math.ceil(count/productsPerPage);i++)
            {
                var li=document.createElement("LI");
                li.className="page-item";
                li.id="link"+(i+1);
                if(i==0)
                    li.className+=" active";

                var link=document.createElement("A");
                link.className="page-link";
                link.innerHTML=i+1;
                link.setAttribute("onClick","pagination("+i+");");
                link.setAttribute("href","#muestra");
                li.appendChild(link);
                list.appendChild(li);
            }
        }
    };
    req.open('GET','products.php?count=1',true);
    req.send();
}

function changeGender(newGender){
    gender = newGender;
    pagination(0);
}

function changeType(newType){
    type = newType;
    pagination(0);
}

function pagination(page){
    var req=new XMLHttpRequest();
    try {
        req.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                var x=document.getElementById("link"+currentPage);
                x.className="page-item";
                currentPage=page+1;
                var x2=document.getElementById("link"+currentPage);
                x2.className+=" active";
                var products=JSON.parse(this.responseText);
                var productsDiv = document.getElementById("productsDiv");
                if(document.getElementById("remove"))
                    productsDiv.removeChild(document.getElementById("remove"));
                var productsDivChild=document.createElement("DIV");
                productsDivChild.id="remove";

                for(var i=0;i<products.records.length;i++){

                    if(gender != 'Todo' && products.records[i].gender != gender ){
                        products.records.shift();
                        i--;
                        continue;
                    }

                    if(type != 'Todo' && products.records[i].type != type){
                        products.records.shift();
                        i--;
                        continue;
                    }

                    var product=document.createElement("DIV");
                    product.className="col-lg-3 col-md-6";

                    var dp=document.createElement("DIV");
                    dp.className="border-bottom border-dark";
                    var a = document.createElement('A');
                    a.href = 'product.php?id='+products.records[i].id;
                    a.style.color = 'black';

                    a.appendChild(dp);
                    product.appendChild(a);

                    var img=document.createElement("IMG");
                    var idImg = products.records[i].id;
                    img.src="images/products/"+idImg+"-0.jpg";
                    img.setAttribute('height','200px');

                    var stock = parseInt(products.records[i].stock);
                    if(stock == 0 )
                        img.style.opacity = "0.2";
                    dp.appendChild(img);

                    var d=document.createElement("DIV");
                    d.className="card-body";
                    dp.appendChild(d);

                    var h=document.createElement("H5");
                    h.className="card-title";
                    h.innerHTML=products.records[i].productname;
                    d.appendChild(h);

                    var p=document.createElement("P");
                    p.innerHTML=products.records[i].description;
                    p.className="card-text";
                    d.appendChild(p);

                    var d2=document.createElement("DIV");
                    d2.className="d-flex flex-row-reverse";
                    d.appendChild(d2);

                    var discount = parseInt(products.records[i].discount);
                    var price = products.records[i].price;
                    if(discount > 0 ){
                        var k=document.createElement("STRIKE");
                        k.innerHTML="$"+products.records[i].price;
                        d2.appendChild(k);

                        var k=document.createElement("KBD");
                        k.innerHTML="$"+(price - (price*discount)/100).toString();
                        d2.appendChild(k);
                    }
                    else{
                        var k=document.createElement("KBD");
                        k.innerHTML="$"+products.records[i].price;
                        d2.appendChild(k);
                    }

                    if(i%4==0){
                        var row=document.createElement("DIV");
                        row.className="row py-2";
                        row.id="row"+Math.floor(i/4);
                        row.appendChild(product);
                        productsDivChild.appendChild(row);
                    }
                    else{
                        var row=document.getElementById("row"+Math.floor(i/4));
                        row.appendChild(product);
                    }
                    productsDiv.appendChild(productsDivChild);
                }
            }
        };
    }
    catch(err) {
        pagination(page);
    }
    req.open("GET", "products.php?limit="+productsPerPage+"&offset="+(page*productsPerPage), true);
    req.send();
}

var xhttp;
function getProducts(){
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            var products=JSON.parse(this.responseText);
            var productsDiv = document.getElementById("productsDiv");
            for(var i=0;i<products.records.length;i++)
            {
                var product=document.createElement("DIV");
                product.className="col-lg-3 col-md-6";

                var dp=document.createElement("DIV");
                dp.className="border-bottom border-dark";

                var img=document.createElement("IMG");
                img.src="images/products/"+products.records[i].image;
                var stock = parseInt(products.records[i].stock);
                if(stock == 0 )
                    img.style.opacity = "0.2";
                dp.appendChild(img);

                var d=document.createElement("DIV");
                d.className="card-body";
                dp.appendChild(d);

                var h=document.createElement("H5");
                h.className="card-title";
                h.innerHTML=products.records[i].productname;
                d.appendChild(h);

                var p=document.createElement("P");
                p.innerHTML=products.records[i].description;
                p.className="card-text";
                d.appendChild(p);

                var d2=document.createElement("DIV");
                d2.className="d-flex flex-row-reverse";
                d.appendChild(d2);

                var discount = parseInt(products.records[i].discount);
                var price = products.records[i].price;
                if(discount > 0 ){
                    var k=document.createElement("STRIKE");
                    k.innerHTML="$"+products.records[i].price;
                    d2.appendChild(k);

                    var k=document.createElement("KBD");
                    k.innerHTML="$"+(price - (price*discount)/100).toString();
                    d2.appendChild(k);
                }
                else{
                    var k=document.createElement("KBD");
                    k.innerHTML="$"+products.records[i].price;
                    d2.appendChild(k);
                }

                if(i%4==0){
                    var row=document.createElement("DIV");
                    row.className="row py-2";
                    row.id="row"+Math.floor(i/4);
                    row.appendChild(product);
                    productsDiv.appendChild(row);
                }
                else{
                    var row=document.getElementById("row"+Math.floor(i/4));
                    row.appendChild(product);
                }
            }
        }
    };
    xhttp.open("GET", "products.php", true);
    xhttp.send();
}