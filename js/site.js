$("#content").on("scroll", function() {
    saveContentScrollPosition();
})
function saveContentScrollPosition() {
    let contentScrollPosition = $("#content")[0].scrollTop;
    localStorage.setItem("contentScrollPosition",contentScrollPosition);
}
function restoreContentScrollPosition() {
    $("#content")[0].scrollTop = localStorage.getItem("contentScrollPosition");
}