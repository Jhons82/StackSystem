document.addEventListener('DOMContentLoaded', function() {
    if (typeof questionId === 'undefined' || !questionId) return;

    const formData = new FormData();
    formData.append('question_id', questionId);

    fetch(BASE_URL + 'controllers/question.php?op=register_view', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        console.log('Vista Registrada:', data);
        getTotalViews(questionId);
    })
    .catch(error => {
        console.error('Error al registrar la vista:', error);
    });
});

function getTotalViews(questionId) {
    fetch(BASE_URL + 'controllers/question.php?op=get_total_views', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({ question_id: questionId })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === "success") {
            const viewEl = document.getElementById('total_views');
            if (viewEl) viewEl.innerText = `${data.total_views} veces`;
        }
    })
    .catch(error => {
        console.error('Error obteniendo vistas:', error);
    });
}