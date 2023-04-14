<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Agenda</title>
    <link rel="stylesheet" href="styles/agenda.css" type="text/css" />
  </head>
  <body>
    <!-- le menu de navigation -->
    <nav>
      <ul class="barre-de-menu">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="cv.php">Mon CV</a></li>
        <li><a href="agenda.php" class="actuel">Agenda</a></li>
        <li><a href="photos.php">Photos</a></li>
      </ul>
    </nav>

    <!-- le contenu de la page -->
    <main>
      <header>
        <h1>Agenda de la semaine</h1>
      </header>
      <section id="contenu">
        <table id="agenda">
          <thead>
            <tr>
              <th>Horaires</th>
              <th>Lundi</th>
              <th>Mardi</th>
              <th>Mercredi</th>
              <th>Jeudi</th>
              <th>Vendredi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td id="prueba">8h-10h</td>
              <td class="ang">Anglais</td>
              <td></td>
              <td class="bases">Bases de données</td>
              <td rowspan="2" class="web">Technologies du Web</td>
              <td rowspan="2" class="prog">Programmation</td>
            </tr>
            <tr>
              <td>10h-12h</td>
              <td class="reseaux">Réseaux</td>
              <td class="algo">Algorithmique</td>
              <td class="genie">Génie Logiciel</td>
            </tr>
            <tr id="separateur">
              <td colspan="6"></td>
            </tr>
            <tr>
              <td>13h-15h</td>
              <td rowspan="2" class="bases">Bases de données</td>
              <td rowspan="2" class="prog">Programmation</td>
              <td class="syst">Systèmes</td>
              <td rowspan="2" class="sport">Sport</td>
              <td class="ang">Anglais</td>
            </tr>
            <tr>
              <td>15h-17h</td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
        <table id="legende">
          <tbody>
            <tr>
              <td class="algo"></td>
              <td>Algorithmique</td>
              <td class="genie"></td>
              <td>Génie Logiciel</td>
              <td class="sport"></td>
              <td>Sport</td>
            </tr>
            <tr>
              <td class="ang"></td>
              <td>Anglais</td>
              <td class="prog"></td>
              <td>Programmation</td>
              <td class="syst"></td>
              <td>Systèmes</td>
            </tr>
            <tr>
              <td class="bases"></td>
              <td>Bases de données</td>
              <td class="reseaux"></td>
              <td>Réseaux</td>
              <td class="web"></td>
              <td>Technologies du Web</td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
  </body>
</html>
