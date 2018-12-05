var todaynew = new Date();
var dd = todaynew.getDate().toString();
var mm = (todaynew.getMonth()+1).toString();
var yyyy = todaynew.getFullYear().toString();
var currentDate = dd.concat(mm).concat(yyyy);
var a = todaynew.toLocaleDateString();
console.log(todaynew);
var format = dateFormat.masks('DD-MM-YYYY');
format(todaynew);
console.log(format(todaynew))
dateFormat(now, "hammerTime");
var dateFormatted = dateFormat(todaynew, "isoDateTime");
console.log(dateFormatted);

function transportSingle(){
    document.getElementById('return-date').style.display='none';
    document.getElementById('return-time').style.display ='none';
}

function transportReturn(){
    document.getElementById('return-date').style.display ='block';
    document.getElementById('return-time').style.display ='block';
}




