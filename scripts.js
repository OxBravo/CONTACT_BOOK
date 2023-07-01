function search()
{
    document.getElementById('search').submit();
}
function keybab()
{
    current_state = document.getElementById('three_dot_menu').style.visibility;
    if(current_state == "hidden")
        document.getElementById('three_dot_menu').style.visibility = "visible";
    else
        document.getElementById('three_dot_menu').style.visibility = "hidden";
}