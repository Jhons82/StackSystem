document.addEventListener('DOMContentLoaded', function () {
    const voteContainers = document.querySelectorAll('.vote-container');

    voteContainers.forEach(container => {
        const postId = container.dataset.id;
        const postType = container.dataset.type;

        // Obtener votos del usuario actual
        fetch(BASE_URL + 'controllers/vote.php?op=get_user_vote', {
            method: 'POST',
            body: new URLSearchParams({ post_id: postId, post_type: postType })
        })
        .then(res => res.json())
        .then(data => {
            if (data.vote_type) {
                const voteButton = container.querySelector(`.btn-vote.${data.vote_type}`);
                if (voteButton) voteButton.classList.add('voted');
            }
        });

        // Obtener conteo total
        fetch(BASE_URL + 'controllers/vote.php?op=get_votes', {
            method: 'POST',
            body: new URLSearchParams({ post_id: postId, post_type: postType })
        })
        .then(res => res.json())
        .then(data => {
            const countDiv = container.querySelector('.vote-count');
            if (countDiv) countDiv.textContent = data.total;
        });

        // Evento click para votar
        container.querySelectorAll('.btn-vote').forEach(button => {
            button.addEventListener('click', function () {
                const voteType = this.classList.contains('up') ? 'up' : 'down';

                fetch(BASE_URL + 'controllers/vote.php?op=vote', {
                    method: 'POST',
                    body: new URLSearchParams({
                        post_id: postId,
                        post_type: postType,
                        vote_type: voteType
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'error') {
                        alert(data.message);
                        return;
                    }

                    // Resetear botones
                    container.querySelectorAll('.btn-vote').forEach(btn => btn.classList.remove('voted'));

                    // Si no fue eliminación, aplicar clase
                    if (data.status !== 'deleted') {
                        this.classList.add('voted');
                    }

                    // Actualizar contador
                    fetch(BASE_URL + 'controllers/vote.php?op=get_votes', {
                        method: 'POST',
                        body: new URLSearchParams({ post_id: postId, post_type: postType })
                    })
                    .then(res => res.json())
                    .then(data => {
                        const countDiv = container.querySelector('.vote-count');
                        if (countDiv) countDiv.textContent = data.total;
                    });
                })
                .catch(error => console.error("Error al votar:", error));
            });
        });
    });
});