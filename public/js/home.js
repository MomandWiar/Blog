function selectById(id) {
    return document.getElementById(id);
}

function showComments(postId) {
    var post = 'post' + postId;
    var button = 'info' + postId;

    if (selectById(button).innerHTML == '-') {
        selectById(post).style.backgroundColor = 'transparent';
        selectById(button).innerHTML = '+';
    } else {
        selectById(post).style.backgroundColor = 'red';
        selectById(button).innerHTML = '-';
    }
}