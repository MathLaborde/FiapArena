document.addEventListener("DOMContentLoaded", function() {
    const thumbnails = document.querySelectorAll(".carousel-thumbnail");
    const displayImage = document.getElementById("display-image");
    const imageText = document.getElementById("image-text");
    const additionalText = document.getElementById("image-additional-text");
    const largeText = document.getElementById("image-large-text");
    const exploreButton = document.querySelector(".explore-button"); // Seleciona o botão

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener("click", function() {
            const src = thumbnail.src;
            const text = thumbnail.getAttribute("data-text");
            const additional = thumbnail.getAttribute("data-additional-text");
            const large = thumbnail.getAttribute("data-large-text");

            displayImage.src = src;
            imageText.textContent = text;
            additionalText.textContent = additional;
            largeText.textContent = large;

            // Adicionando a imagem como fundo da página
            document.body.style.backgroundImage = `url(${src})`;
            document.body.style.backgroundSize = "cover";
            document.body.style.backgroundRepeat = "no-repeat";
            document.body.style.backgroundPosition = "center center";

            // Removendo a classe 'active' de todas as miniaturas
            thumbnails.forEach(img => img.classList.remove("active"));

            // Adicionando a classe 'active' à miniatura clicada
            thumbnail.classList.add("active");
        });
    });

    exploreButton.addEventListener("click", function() {
        console.log("Explore button clicked!");
        // Adicione a funcionalidade desejada aqui
    });
});
