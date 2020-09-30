

$(document).ready ( function(){
    $(".size").each(function(){
        console.log(this.text())
        this.html(filesize(this.text(), {unix: true}));
    });
});

