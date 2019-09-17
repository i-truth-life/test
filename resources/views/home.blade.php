<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Test App on Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    TEST APP
                </div>
                <table id="main-table" class="js-sort-table table">
                    <thead>
                        <th scope="col">age</th>
                        <th scope="col">eyeColor</th>
                        <th scope="col">name</th>
                        <th scope="col">gender</th>
                        <th scope="col">company</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">address</th>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <button id="btn-more">Read More</button>
            </div>

        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

    <script type="text/javascript">
/* Copyright (c) 2006-2019 Tyler Uebele * Released under the MIT license. * latest at https://github.com/stationer/sSortTable/ * minified by Google Closure Compiler */
function sortTable(a,b,c){sortTable.sortCol=-1;var d=a.className.match(/js-sort-\d+/);null!=d&&(sortTable.sortCol=d[0].replace(/js-sort-/,""),a.className=a.className.replace(new RegExp(" ?"+d[0]+"\\b"),""));"undefined"===typeof b&&(b=sortTable.sortCol);"undefined"!==typeof c?sortTable.sortDir=-1==c||"desc"==c?-1:1:(d=a.className.match(/js-sort-(a|de)sc/),sortTable.sortDir=null!=d&&sortTable.sortCol==b?"js-sort-asc"==d[0]?-1:1:1);a.className=a.className.replace(/ ?js-sort-(a|de)sc/g,"");a.className+=
" js-sort-"+b;sortTable.sortCol=b;a.className+=" js-sort-"+(-1==sortTable.sortDir?"desc":"asc");b<a.tHead.rows[a.tHead.rows.length-1].cells.length&&(d=a.tHead.rows[a.tHead.rows.length-1].cells[b].className.match(/js-sort-[-\w]+/));for(c=0;c<a.tHead.rows[a.tHead.rows.length-1].cells.length;c++)b==a.tHead.rows[a.tHead.rows.length-1].cells[c].getAttribute("data-js-sort-colNum")&&(d=a.tHead.rows[a.tHead.rows.length-1].cells[c].className.match(/js-sort-[-\w]+/));sortTable.sortFunc=null!=d?d[0].replace(/js-sort-/,
""):"string";a.querySelectorAll(".js-sort-active").forEach(function(a){a.className=a.className.replace(/ ?js-sort-active\b/,"")});a.querySelectorAll('[data-js-sort-colNum="'+b+'"]:not(:empty)').forEach(function(a){a.className+=" js-sort-active"});b=[];a=a.tBodies[0];for(c=0;c<a.rows.length;c++)b[c]=a.rows[c];for(b.sort(sortTable.compareRow);a.firstChild;)a.removeChild(a.firstChild);for(c=0;c<b.length;c++)a.appendChild(b[c])}
sortTable.compareRow=function(a,b){"function"!=typeof sortTable[sortTable.sortFunc]&&(sortTable.sortFunc="string");a=sortTable[sortTable.sortFunc](a.cells[sortTable.sortCol]);b=sortTable[sortTable.sortFunc](b.cells[sortTable.sortCol]);return a==b?0:sortTable.sortDir*(a>b?1:-1)};sortTable.stripTags=function(a){return a.replace(/<\/?[a-z][a-z0-9]*\b[^>]*>/gi,"")};sortTable.date=function(a){return new Date(sortTable.stripTags(a.innerHTML))};
sortTable.number=function(a){return Number(sortTable.stripTags(a.innerHTML).replace(/[^-\d.]/g,""))};sortTable.string=function(a){return sortTable.stripTags(a.innerHTML).toLowerCase()};sortTable.last=function(a){return sortTable.stripTags(a.innerHTML).split(" ").pop().toLowerCase()};sortTable.input=function(a){for(var b=0;b<a.children.length;b++)if("object"==typeof a.children[b]&&"undefined"!=typeof a.children[b].value)return a.children[b].value.toLowerCase();return sortTable.string(a)};
sortTable.getClickHandler=function(a,b){return function(){sortTable(a,b)}};
sortTable.init=function(){var a=document.querySelectorAll?document.querySelectorAll("table.js-sort-table"):document.getElementsByTagName("table");for(var b=0;b<a.length;b++)if((document.querySelectorAll||null!==a[b].className.match(/\bjs-sort-table\b/))&&!a[b].attributes["data-js-sort-table"]){if(a[b].tHead)var c=a[b].tHead;else c=document.createElement("thead"),c.appendChild(a[b].rows[0]),a[b].insertBefore(c,a[b].children[0]);for(var d=0;d<c.rows.length;d++)for(var e=0,f=0;e<c.rows[d].cells.length;e++){c.rows[d].cells[e].setAttribute("data-js-sort-colNum",
f);var g=sortTable.getClickHandler(a[b],f);window.addEventListener?c.rows[d].cells[e].addEventListener("click",g):window.attachEvent&&c.rows[d].cells[e].attachEvent("onclick",g);f+=c.rows[d].cells[e].colSpan}a[b].setAttribute("data-js-sort-table","true")}c=document.createElement("style");document.head.insertBefore(c,document.head.childNodes[0]);c=c.sheet;c.insertRule('table.js-sort-asc thead tr > .js-sort-active:after{content:"\\25b2";font-size:0.7em;padding-left:3px;line-height:0.7em;}');c.insertRule('table.js-sort-desc thead tr > .js-sort-active:after{content:"\\25bc";font-size:0.7em;padding-left:3px;line-height:0.7em;}')};
window.addEventListener?window.addEventListener("load",sortTable.init,!1):window.attachEvent&&window.attachEvent("onload",sortTable.init);
    
    jQuery(function ( $ ) { 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
       
        $("#btn-more").click(function(e){
            e.preventDefault();
    
            $.ajax({
               type:'POST',
               url:'/ajax',
               data:{},
               success:function(data){
                if (data.success) {
                    data.success.forEach(function(element) {
                        var newRow =$('<tr/>',{});
                    
                        newRow.append( $('<td/>',{text:element.item[0].age}) );
                        newRow.append( $('<td/>',{text:element.item[0].eyeColor}) );
                        newRow.append( $('<td/>',{text:element.item[0].name}) );
                        newRow.append( $('<td/>',{text:element.item[0].gender}) );
                        newRow.append( $('<td/>',{text:element.item[0].company}) );
                        newRow.append( $('<td/>',{text:element.item[0].email}) );
                        newRow.append( $('<td/>',{text:element.item[0].phone}) );
                        newRow.append( $('<td/>',{text:element.item[0].address}) );
                    
                        $('#main-table > tbody').append(newRow);
                    });

                  } else {
                      alert(data.success);
                  }

                  if (data.finish) {
                    $('#btn-more').hide();
                  }
               }
            });
    
        });
    
        $("#btn-more").click();
    });

    </script>

</html>
