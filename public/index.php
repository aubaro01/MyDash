<?php
  echo '<!DOCTYPE html>';
  echo '<html lang="pt-BR">';
  echo '<head>';
  echo '  <meta charset="UTF-8">';
  echo '  <meta name="viewport" content="width=device-width, initial-scale=1.0">';
  echo '  <title>MyOffice</title>';
  echo '  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />';
  echo '  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />';
  echo '</head>';
  echo '<body>';

  // Navbar
  echo '<nav class="navbar navbar-expand-md navbar-light bg-white shadow fixed-top">';
  echo '  <div class="container">';
  echo '    <a class="navbar-brand fw-bold text-dark" href="/">MyOffice</a>';
  echo '    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">';
  echo '      <span class="navbar-toggler-icon"></span>';
  echo '    </button>';
  echo '    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">';
  echo '      <ul class="navbar-nav">';
  echo '        <li class="nav-item"><a class="nav-link" href="#recursos">Recursos</a></li>';
  echo '        <li class="nav-item"><a class="nav-link" href="#produto">Produto</a></li>';
  echo '        <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>';
  echo '        <li class="nav-item"><a class="nav-link btn btn-outline-dark" href="../database/Auth/login.php">Login</a></li>';
  echo '      </ul>';
  echo '    </div>';
  echo '  </div>';
  echo '</nav>';

  // Hero Section
  echo '<section class="d-flex flex-column align-items-center justify-content-center text-white text-center" style="height: 100vh; background: linear-gradient(to right, #343a40, #6c757d)">';
  echo '  <h1 class="display-4 fw-bold">MyOffice</h1>';
  echo '  <p class="lead">Gestão inteligente para oficinas automotivas</p>';
  echo '</section>';

  // Recursos
  echo '<section id="recursos" class="py-5">';
  echo '  <div class="container">';
  echo '    <h2 class="text-center mb-4">Recursos</h2>';
  echo '    <div class="row">';

  // Cards (Usar um loop para economizar código)
  $recursos = [
    ["Gestão de Clientes", "Organize seus clientes de forma eficiente.", "bi-people"],
    ["Controle de Veículos", "Acompanhe veículos e serviços realizados.", "bi-car-front"],
    ["Agendamentos", "Gerencie e automatize as marcações.", "bi-calendar-check"]
  ];

  foreach ($recursos as $recurso) {
    echo '    <div class="col-md-4 mb-4">';
    echo '      <div class="card h-100 shadow-sm">';
    echo '        <div class="card-body text-center">';
    echo '          <div class="mb-3">';
    echo '            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi ' . $recurso[2] . ' text-dark" viewBox="0 0 16 16">';
    echo '              <path d="M13 7c0 1.105-.672 2-1.5 2S10 8.105 10 7s.672-2 1.5-2S13 5.895 13 7zm-9 0c0 1.105.672 2 1.5 2S7 8.105 7 7s-.672-2-1.5-2S4 5.895 4 7zM10 8.5c.828 0 1.5.895 1.5 2S10.828 13 10 13H6c-.828 0-1.5-.895-1.5-2S5.172 8.5 6 8.5h4zM4.5 6a2.5 2.5 0 1 1 5 0 2.5 2.5 0 0 1-5 0z" />';
    echo '            </svg>';
    echo '          </div>';
    echo '          <h5 class="card-title">' . $recurso[0] . '</h5>';
    echo '          <p class="card-text">' . $recurso[1] . '</p>';
    echo '        </div>';
    echo '      </div>';
    echo '    </div>';
  }

  echo '    </div>';
  echo '  </div>';
  echo '</section>';

  // Produto
  echo '<section id="produto" class="py-5 bg-white">';
  echo '  <div class="container">';
  echo '    <h2 class="text-center mb-4">Nosso Produto</h2>';
  echo '    <div class="row align-items-center">';
  echo '      <div class="col-md-6">';
  echo '        <img src="../assets/img/relatorio.png" class="img-fluid rounded shadow" alt="Interface do Sistema" />';
  echo '      </div>';
  echo '      <div class="col-md-6">';
  echo '        <h3 class="mb-3">Interface Intuitiva</h3>';
  echo '        <p>Experiência moderna e fluida para melhor produtividade. Nossa interface foi projetada para simplificar tarefas e otimizar o fluxo de trabalho, oferecendo uma experiência agradável e intuitiva.</p>';
  echo '        <ul class="list-unstyled">';
  echo '          <li class="mb-2"><i class="bi bi-check2 me-2 text-dark"></i>Fácil navegação</li>';
  echo '          <li class="mb-2"><i class="bi bi-check2 me-2 text-dark"></i>Design responsivo</li>';
  echo '          <li class="mb-2"><i class="bi bi-check2 me-2 text-dark"></i>Performance otimizada</li>';
  echo '        </ul>';
  echo '      </div>';
  echo '    </div>';
  echo '  </div>';
  echo '</section>';

  // Contato
  echo '<section id="contato" class="py-5">';
  echo '  <div class="container">';
  echo '    <h2 class="text-center mb-4">Entre em Contato</h2>';
  echo '    <div class="row justify-content-center">';
  echo '      <div class="col-md-6">';
  echo '        <div class="card shadow-sm">';
  echo '          <div class="card-body">';
  echo '            <form>';
  echo '              <div class="mb-3">';
  echo '                <input type="text" class="form-control" placeholder="Nome" required />';
  echo '              </div>';
  echo '              <div class="mb-3">';
  echo '                <input type="email" class="form-control" placeholder="Email" required />';
  echo '              </div>';
  echo '              <div class="mb-3">';
  echo '                <textarea class="form-control" rows="4" placeholder="Mensagem" required></textarea>';
  echo '              </div>';
  echo '              <div class="d-grid">';
  echo '                <button type="submit" class="btn btn-dark">Enviar</button>';
  echo '              </div>';
  echo '            </form>';
  echo '          </div>';
  echo '        </div>';
  echo '      </div>';
  echo '    </div>';
  echo '  </div>';
  echo '</section>';

  echo '<a href="../Dashboard/app.php" class="btn btn-primary download-btn">ver</a>';

  // Footer
  echo '<footer class="bg-dark text-white text-center py-3">';
  echo '  <div class="container">';
  echo '    <p class="mb-0">PC Auto © 2025. Todos os direitos reservados.</p>';
  echo '  </div>';
  echo '</footer>';

  // Scripts Bootstrap
  echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>';
  echo '</body>';
  echo '</html>';
?>
