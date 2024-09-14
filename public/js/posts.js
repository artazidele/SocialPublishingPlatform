// function that opens div
function openWindow(id) {
    document.getElementById(id).classList.remove('hiddenDiv');
    document.getElementById(id).classList.add('visibleDiv');
}

// function that closes div
function closeWindow(id) {
    document.getElementById(id).classList.remove('visibleDiv');
    document.getElementById(id).classList.add('hiddenDiv');
}

let postId = 0;
let commentId = 0;
// function that opens comment div
function openCommentWindow(id, newPostId, newCommentId) {
    postId = newPostId;
    commentId = newCommentId;
    document.getElementById(id).classList.remove('hiddenDiv');
    document.getElementById(id).classList.add('visibleDiv');
}

// function that calls delete comment request 
function deleteComment() {
    window.location='/posts/'+postId+'/comments/destroy/'+commentId;
}

