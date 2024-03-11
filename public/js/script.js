document.addEventListener('DOMContentLoaded', function() {
    var btns = document.querySelectorAll('.btn-card');
    var commentButtons = document.querySelectorAll('.comment-button');
    var commentForms = document.querySelectorAll('.comment-form');

    btns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var heartIcon = btn.querySelector('.fa-heart');
            var articleId = this.dataset.articleId;
            var likesCountElement = document.querySelector('#likes-count-' + articleId);
    
            if (!likesCountElement) {
                return;
            }
    
            if (heartIcon) {
                if (btn.classList.contains('liked')) {
                    heartIcon.classList.add('heart-red');
                } else {
                    heartIcon.classList.remove('heart-red');
                }
            }
    
            fetch('/articles/' + articleId + '/like', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                likesCountElement.textContent = data.likes;
            
                if (heartIcon) {
                    if (data.liked) {
                        btn.classList.add('liked');
                        heartIcon.classList.add('heart-red', 'heart-beat');
                        setTimeout(function() {
                            heartIcon.classList.remove('heart-beat');
                        }, 500);
                    } else {
                        btn.classList.remove('liked');
                        heartIcon.classList.remove('heart-red');
                    }
                }
            })
            .catch(error => {});
        });
    });
  

    commentButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.stopPropagation();
    
            var articleId = this.dataset.articleId;
    
            var commentForm = document.querySelector('#comment-form-' + articleId);
            if (commentForm) {
                commentForm.style.display = 'block';
            }
        });
    });

    commentForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var articleId = this.dataset.articleId;
            var commentText = this.querySelector('[name="comment"]').value;
    
            var formData = new URLSearchParams();
            formData.append('body', commentText);
            formData.append('article_id', articleId);
    
            fetch('/articles/' + articleId + '/comments', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                var commentsSection = document.querySelector('#comments-section-' + articleId);
                var commentElement = document.createElement('div');
                var userProfileImageElement = document.createElement('img');
                var userNameElement = document.createElement('p');
                var commentTextElement = document.createElement('p');
    
                userNameElement.textContent = data.comment.user.name;
                commentTextElement.textContent = data.comment.body;
    
                commentElement.appendChild(userProfileImageElement);
                commentElement.appendChild(userNameElement);
                commentElement.appendChild(commentTextElement);
                commentsSection.appendChild(commentElement);
    
                this.style.display = 'none';
                this.querySelector('[name="comment"]').value = '';
            })
            .catch(error => {});
        });
    });
});

document.querySelectorAll('.comment-button').forEach(function(button) {
    button.addEventListener('click', function() {
        var articleId = this.dataset.articleId;
        var form = document.querySelector('#comment-form-' + articleId);
        form.style.display = form.style.display === 'none' ? 'flex' : 'none';
    });
});

document.querySelectorAll('.like-comment-button').forEach(function(button) {
    button.addEventListener('click', function() {
        var commentId = this.dataset.commentId;
        var likeIcon = this.querySelector('.fa-heart');
        var likesCountElement = document.querySelector('#likes-count-' + commentId);

        if (!likesCountElement) {
            return;
        }

        if (likeIcon) {
            if (button.classList.contains('liked')) {
                likeIcon.classList.add('heart-red');
            } else {
                likeIcon.classList.remove('heart-red');
            }
        }

        fetch('/comments/' + commentId + '/like', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            likesCountElement.textContent = data.likes;
        
            if (likeIcon) {
                if (data.liked) {
                    button.classList.add('liked');
                    likeIcon.classList.add('heart-red', 'heart-beat');
                    setTimeout(function() {
                        likeIcon.classList.remove('heart-beat');
                    }, 500);
                } else {
                    button.classList.remove('liked');
                    likeIcon.classList.remove('heart-red');
                }
            }
        })
        .catch(error => console.error('Error:', error));;
    });
});