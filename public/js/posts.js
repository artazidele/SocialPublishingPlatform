function openWindow(id) {
    document.getElementById(id).classList.remove('hiddenDiv');
    document.getElementById(id).classList.add('visibleDiv');
}

function closeWindow(id) {
    document.getElementById(id).classList.remove('visibleDiv');
    document.getElementById(id).classList.add('hiddenDiv');
}

let postId = 0;
let commentId = 0;
function openCommentWindow(id, newPostId, newCommentId) {
    postId = newPostId;
    commentId = newCommentId;
    document.getElementById(id).classList.remove('hiddenDiv');
    document.getElementById(id).classList.add('visibleDiv');
}

function deleteComment() {
    window.location='/posts/'+postId+'/comments/destroy/'+commentId;
}

