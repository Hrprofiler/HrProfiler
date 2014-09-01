function ajax()
{
    var xhr=null;
 
    if (window.XMLHttpRequest) { 
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) 
    {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //on appelle le fichier reponse.txt
    xhr.open("GET", "http://gael-donat.developpez.com/web/intro-ajax/reponse.txt", false);
    xhr.send(null);
 
    alert(xhr.responseText);
}
