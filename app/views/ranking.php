<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fiap Arena</title>
  <link rel="icon" href="./src/img/MiniLogo.png" />

  <!-- Link com o RESET -->
  <link rel="stylesheet" href="./src/css/reset.css" />
  <!-- Link com o ESTILO DO HEADER -->
  <link rel="stylesheet" href="./src/css/header.css" />
  <!-- Link com o ESTILO DO CONTEÚDO  -->
  <link rel="stylesheet" href="./src/css/ranking.css" />
  <!-- Link com o ESTILO DO FOOTER -->
  <link rel="stylesheet" href="./src/css/footer.css" />

  <!-- Link com Font Awesome -->
  <script
    src="https://kit.fontawesome.com/92f82bc9ac.js"
    crossorigin="anonymous"></script>

  <!-- Link com a fonte INTER -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
    rel="stylesheet" />

  <!-- Link com a fonte BUNGEE -->
  <link
    href="https://fonts.googleapis.com/css2?family=Bungee&family=Inter:wght@100..900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <!-- AQUI COMEÇA O HEADER -->
  <header>
    <nav class="nav-bar">
      <div class="logo">
        <a href="home.html"><img src="src/img/Logo.png" alt="Logo escrito Fiap Arena" /></a>
      </div>

      <div class="nav-list">
        <ul>
          <li class="nav-item">
            <a class="nav-link" href="./home.html">Página Inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./createEvent.html">Criar Torneio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Classificação</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Suporte</a>
          </li>
        </ul>
      </div>

      <div class="container">
        <div class="text">
          <a class="text-link" href="#">Pedro Gonçaves</a>
          <a class="text-link" href="#">pedro@gmail.com</a>
        </div>

        <div>
          <a href="./profile.html" id="perfil-icon">
            <img
              class="profile-img"
              src="src/img/profileImage.svg"
              alt="Foto de Perfil" />
          </a>
        </div>
      </div>

      <div class="menu-hamburger" onclick="toggleMenu()">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
      <ul class="menu">
        <li><a href="home.html">Página Inicial</a></li>
        <li><a href="createEvent.html">Criar Torneio </a></li>
        <li><a class="active" href="ranking.html">Classificação</a></li>
        <li><a href="#">Suporte</a></li>
      </ul>
    </nav>
  </header>
  <!-- AQUI TERMINA O HEADER -->

  <main>
    <table>
      <caption>
        Classificação
      </caption>
      <thead>
        <tr>
          <th class="titulo-tabela">Posição</th>
          <th class="titulo-tabela">Apelido</th>
          <th class="titulo-tabela">Time</th>
          <th class="titulo-tabela win">Vitórias</th>
          <th class="titulo-tabela lose">Derrotas</th>
          <th class="titulo-tabela score">Pontuação</th>
          <th class="titulo-tabela">Solicitação</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>1º</td>
          <td>Jogador01</td>
          <td>Team Liquid</td>
          <td>23</td>
          <td>12</td>
          <td>69</td>
          <td>
            <a href="./profile.html">
              <button class="button">Ver Perfil</button>
            </a>
          </td>
        </tr>

        <tr>
          <td>2º</td>
          <td>Jogador02</td>
          <td>Team Fire</td>
          <td>21</td>
          <td>14</td>
          <td>63</td>
          <td>
            <a href="./profile.html">
              <button class="button">Ver Perfil</button>
            </a>
          </td>
        </tr>

        <tr>
          <td>3º</td>
          <td>Jogador03</td>
          <td>Team Water</td>
          <td>19</td>
          <td>15</td>
          <td>57</td>
          <td>
            <a href="./profile.html">
              <button class="button">Ver Perfil</button>
            </a>
          </td>
        </tr>

        <tr>
          <td>4º</td>
          <td>Jogador04</td>
          <td>Team Falcons</td>
          <td>17</td>
          <td>18</td>
          <td>51</td>
          <td>
            <a href="./profile.html">
              <button class="button">Ver Perfil</button>
            </a>
          </td>
        </tr>

        <tr>
          <td>5º</td>
          <td>Jogador05</td>
          <td>Brave Boys</td>
          <td>13</td>
          <td>21</td>
          <td>39</td>
          <td>
            <a href="./profile.html">
              <button class="button">Ver Perfil</button>
            </a>
          </td>
        </tr>

        <tr>
          <td>6º</td>
          <td>Jogador06</td>
          <td>Cloud9</td>
          <td>12</td>
          <td>22</td>
          <td>36</td>
          <td>
            <a href="./profile.html">
              <button class="button">Ver Perfil</button>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </main>

  <!-- AQUI COMECA O FOOTER -->
  <footer>
    <div class="conteudo-footer">
      <div class="midias">
        <a href="home.html"><img src="src/img/Logo.png" alt="Logo escrito Fiap Arena" /></a>
        <div class="icones-midia">
          <a href="#" id="twitter">
            <i class="fa-brands fa-x-twitter"></i>
          </a>

          <a href="#" id="instagram">
            <i class="fa-brands fa-instagram"></i>
          </a>

          <a href="#" id="youtube">
            <i class="fa-brands fa-youtube"></i>
          </a>

          <a href="#" id="linkedin">
            <i class="fa-brands fa-linkedin"></i>
          </a>
        </div>
      </div>

      <ul class="footer-list">
        <li>
          <h3>Use Cases</h3>
        </li>

        <li><a href="#" class="footer-link">UI Design</a></li>
        <li><a href="#" class="footer-link">UX Design</a></li>
        <li><a href="#" class="footer-link">Wireframing</a></li>
        <li><a href="#" class="footer-link">Diagramming</a></li>
        <li><a href="#" class="footer-link">Brainstorming</a></li>
        <li><a href="#" class="footer-link">Online Whiteboard</a></li>
        <li><a href="#" class="footer-link">Team Collaboaton</a></li>
      </ul>

      <ul class="footer-list">
        <li>
          <h3>Explore</h3>
        </li>

        <li><a href="#" class="footer-link">Design</a></li>
        <li><a href="#" class="footer-link">Prototyping</a></li>
        <li><a href="#" class="footer-link">Development Features</a></li>
        <li><a href="#" class="footer-link">Design Systems</a></li>
        <li><a href="#" class="footer-link">Collaboaton Features</a></li>
        <li><a href="#" class="footer-link">Design Process</a></li>
        <li><a href="#" class="footer-link">FigJam</a></li>
      </ul>

      <ul class="footer-list">
        <li>
          <h3>Resources</h3>
        </li>

        <li><a href="#" class="footer-link">Blog</a></li>
        <li><a href="#" class="footer-link">Best Practices</a></li>
        <li><a href="#" class="footer-link">Colors</a></li>
        <li><a href="#" class="footer-link">Color Wheel</a></li>
        <li><a href="#" class="footer-link">Suport</a></li>
        <li><a href="#" class="footer-link">Developers</a></li>
        <li><a href="#" class="footer-link">Resource Library</a></li>
      </ul>
    </div>
  </footer>
  <!-- AQUI TTERMINA O FOOTER -->

  <script src="./src/js/ranking.js"></script>
</body>

</html>