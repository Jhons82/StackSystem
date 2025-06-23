function init() {

}

$(document).ready(function () {
    // Obtener ID y slug desde la url
    const path = window.location.pathname.split('/');
    const id = path[3];
    const slug = path[4];

    // Validar que ID sea numérico y slug exista
    if (!id || !slug || isNaN(id)) {
        window.location.href = BASE_URL + "404";
        return;
    }

    // Llamar al backend con los datos de la url
    fetch(`${BASE_URL}controllers/usuario.php?op=get_user_profile&id=${id}&slug=${slug}`)
    .then(response => response.text())
    .then(response => {
        try {
            const { status, data, message } = JSON.parse(response);

            if (status === 'success') {
                const fields = {
                    '#usernameprofile' : data.username,
                    '#viewImage' : data.image,
                    '#country' : data.country,
                    '#description' : data.description
                }

                for (const [selector, value] of Object.entries(fields)) {
                    if (selector === '#viewImage') {
                        $(selector).attr('src', value || 'assets/images/user_1.png');
                    } else {
                        $(selector).text(value || '');
                    }
                }

                // Redes sociales
                const socialData = {
                    website : data.website,
                    twitter : data.twitter,
                    facebook : data.facebook,
                    instagram : data.instagram,
                    youtube : data.youtube,
                    vimeo : data.vimeo,
                    github : data.github,
                };

                const socialIcons = {
                    website: 'globe',
                        twitter: 'twitter',
                        facebook: 'facebook',
                        instagram: 'instagram',
                        youtube: 'youtube',
                        vimeo: 'vimeo',
                        github: 'github'
                }

                const $ul = $('#socialLinks');
                $ul.empty(); // Limpiar contenido su existe

                for(const [key, value] of Object.entries(socialData)) {
                    if (value) {
                        const $li = $('<li>', {class : 'ps-3'});

                        const $a = $('<a>', {
                            class : 'd-inline-block',
                            href : value.startsWith('http') ? value : `https://${value}`,
                            target : '_blank'
                        });

                        const $icon = $('<i>', {
                            class : `fab fa-${socialIcons[key]} me-2`
                        });

                        $a.append($icon).append(value);
                        $li.append($a);
                        $ul.append($li);
                    }
                }
            } else {
                window.location.href = BASE_URL + '404';
            }
        } catch (error) {
            console.error('Error al procesar la respuesta JSON:', error);
            alert('Error al procesar la respuesta del servidor.');
        }
    });
});

init();