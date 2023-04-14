<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Mon CV</title>
    <link rel="stylesheet" href="styles/cv.css" type="text/css" />
  </head>
  <body>
    <!-- le menu de navigation -->
    <nav>
      <ul class="barre-de-menu">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="cv.php" class="actuel">Mon CV</a></li>
        <li><a href="agenda.php">Agenda</a></li>
        <li><a href="photos.php">Photos</a></li>
      </ul>
    </nav>

    <main>
      <!-- le contenu de la page -->
      <section id="etat-civil">
        <h1>Etat Civil</h1>
        <img src="./images/maPhoto.png" />
        <p>Jane Doe</p>
        <p>20 place de l'Eglise</p>
        <p>38000, GRENOBLE</p>
        <p>+336xxxxxx</p>
        <p>jane.doe@univ-grenoble-alpes.com</p>
      </section>
      <section id="formation">
        <h1>Formation</h1>
        <dl>
          <dt>Master Spécialité Compétence Complémentaire en Informatique</dt>
          <dd>
            Université Joseph Fourier <span class="dates">2010–2012</span>
          </dd>
          <dt>Master Spécialité XXXX</dt>
          <dd>Université YYY <span class="dates">2008–2010</span></dd>
          <dt>Licence Spécialité ZZZZ</dt>
          <dd>Université YYY <span class="dates">2005–2008</span></dd>
        </dl>
      </section>
      <section id="competences">
        <h1>Compétences Informatique</h1>
        <dl>
          <dt>Langages de Programmation</dt>
          <dd>Java, Swift, C++, Python, Scala</dd>
          <dt>Technologies du web</dt>
          <dd>HTML, CSS, JavaScript, PHP, technologies XML</dd>
          <dt>Bases de données</dt>
          <dd>SQL - MySQL, PostgreSQL (extension PostGIS), MongoDB</dd>
          <dt>Méthodologies</dt>
          <dd>UML, Méthodes agiles, RUP, SCRUM</dd>
          <dt>Outils de développement</dt>
          <dd>Eclipse, VS Code, Git, Maven, Ant, Jenkins</dd>
        </dl>
      </section>
      <section id="experiences">
        <h1>Experiences profesionnelles</h1>
        <p>à compléter.....</p>
      </section>
    </main>
  </body>
</html>
