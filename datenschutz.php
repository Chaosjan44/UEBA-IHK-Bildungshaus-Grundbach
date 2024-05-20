<?php 
ob_start();
require_once("templates/header.php"); 
$buffer=ob_get_contents();
ob_end_clean();

$title = "ÜBA - IHK Bildungshaus Region Stuttgart - Datenschutz auf unserer Webseite";
$buffer = preg_replace('/(<title>)(.*?)(<\/title>)/i', '$1' . $title . '$3', $buffer);
echo $buffer;
?>
<div class="container py-3">
    <div style="min-height: 80vh;">
        <h1 class="display-3 text-center">Datenschutzerklärung</h1>
        <h3>1 . Datenschutz auf einen Blick</h3>
        <h5 class="mb-1">Allgemeine Hinweise</h5>
        <p class="mb-3">
            Die folgenden Hinweise geben einen einfachen Überblick darüber, was mit Ihren personenbezogenen Daten passiert, wenn Sie unsere Website besuchen.<br>
            Personenbezogene Daten sind alle Daten, mit denen Sie persönlich identifiziert werden können.
        </p>
        <h5 class="mb-1">Datenerfassung auf unserer Website</h5>
        <p class="mb-3">
            Die Datenverarbeitung auf dieser Website erfolgt durch den Webseitenbetreiber.<br>
            Dessen Kontaktdaten können Sie dem <a href="/impressum.php" class="slink">Impressum</a> dieser Website entnehmen.
        </p>
        <h5 class="mb-1">Wie erfassen wir Ihre Daten?</h5>
        <p class="mb-3">
            Ihre Daten werden zum einen dadurch erhoben, dass Sie uns diese mitteilen. Hierbei kann es sich z.B. um Daten handeln, die Sie in ein Kontaktformular eingeben.<br>
            Andere Daten werden automatisch beim Besuch der Website durch unsere IT-Systeme erfasst.<br>
            Das sind vor allem technische Daten (z.B. Internetbrowser, Betriebssystem oder Uhrzeit des Seitenaufrufs).<br>
            Die Erfassung dieser Daten erfolgt automatisch, sobald Sie unsere Webseite aufrufen.
        </p>
        <h5 class="mb-1">Wofür nutzen wir Ihre Daten?</h5>
        <p class="mb-3">
            Ein Teil der Daten wird erhoben, um eine fehlerfreie Bereitstellung der Website zu gewährleisten. Andere Daten können zur Analyse Ihres Nutzerverhaltens verwendet werden.
        </p>
        <h5 class="mb-1">Welche Rechte haben Sie bezüglich Ihrer Daten?</h5>
        <p class="mb-3">
            Sie haben jederzeit das Recht unentgeltlich Auskunft über Herkunft, Empfänger und Zweck Ihrer gespeicherten personenbezogenen Daten zu erhalten.<br>
            Sie haben außerdem ein Recht, die Berichtigung, Sperrung oder Löschung dieser Daten zu verlangen.<br>
            Hierzu sowie zu weiteren Fragen zum Thema Datenschutz können Sie sich jederzeit unter der im <a href="/impressum.php" class="slink">Impressum</a> angegebenen Adresse an uns wenden.<br>
            Des Weiteren steht Ihnen ein Beschwerderecht bei der zuständigen Aufsichtsbehörde zu.
        </p>

        <h3>2. Allgemeine Hinweise und Pflichtinformationen</h3>
        <h5 class="mb-1">Datenschutz</h5>
        <p class="mb-3">
            Die Betreiber dieser Seiten nehmen den Schutz Ihrer persönlichen Daten sehr ernst.<br>
            Wir behandeln Ihre personenbezogenen Daten vertraulich und entsprechend der gesetzlichen Datenschutzvorschriften sowie dieser Datenschutzerklärung.<br>
            Wenn Sie diese Website benutzen, werden verschiedene personenbezogene Daten erhoben.<br>
            Personenbezogene Daten sind Daten, mit denen Sie persönlich identifiziert werden können.<br>
            Die vorliegende Datenschutzerklärung erläutert, welche Daten wir erheben und wofür wir sie nutzen. Sie erläutert auch, wie und zu welchem Zweck das geschieht.<br>
            Wir weisen darauf hin, dass die Datenübertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitslücken aufweisen kann.<br>
            Ein lückenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht möglich.
        </p>
        <h5 class="mb-1">Widerruf Ihrer Einwilligung zur Datenverarbeitung</h5>
        <p class="mb-3">
            Viele Datenverarbeitungsvorgänge sind nur mit Ihrer ausdrücklichen Einwilligung möglich.<br>
            Sie können eine bereits erteilte Einwilligung jederzeit widerrufen. Dazu reicht eine formlose Mitteilung per E-Mail an uns.<br>
            Die Rechtmäßigkeit der bis zum Widerruf erfolgten Datenverarbeitung bleibt vom Widerruf unberührt.
        </p>
        <h5 class="mb-1">Beschwerderecht bei der zuständigen Aufsichtsbehörde</h5>
        <p class="mb-3">
            Im Falle datenschutzrechtlicher Verstöße steht dem Betroffenen ein Beschwerderecht bei der zuständigen Aufsichtsbehörde zu.<br>
            Zuständige Aufsichtsbehörde in datenschutzrechtlichen Fragen ist der Landesdatenschutzbeauftragte des Bundeslandes, in dem unser Unternehmen seinen Sitz hat.<br>
            Eine Liste der Datenschutzbeauftragten sowie deren Kontaktdaten können folgendem Link entnommen werden:<br>
            <a href="https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html" target="_blank" class="slink">https://www.bfdi.bund.de/DE/Infothek/Anschriften_Links/anschriften_links-node.html</a>.
        </p>
        <h5 class="mb-1">Recht auf Datenübertragbarkeit</h5>
        <p class="mb-3">
            Sie haben das Recht, Daten, die wir auf Grundlage Ihrer Einwilligung oder in Erfüllung eines Vertrags automatisiert verarbeiten,<br>
            an sich oder an einen Dritten in einem gängigen, maschinenlesbaren Format aushändigen zu lassen,<br>
            Sofern Sie die direkte Übertragung der Daten an einen anderen Verantwortlichen verlangen, erfolgt dies nur, soweit es technisch machbar ist.
        </p>
        <h5 class="mb-1">Auskunft , Sperrung, Löschung</h5>
        <p class="mb-3">
            Sie haben im Rahmen der geltenden gesetzlichen Bestimmungen jederzeit das Recht auf unentgeltliche Auskunft über Ihre gespeicherten personenbezogenen Daten,<br>
            deren Herkunft und Empfänger und den Zweck der Datenverarbeitung und ggf. ein Recht auf Berichtigung, Sperrung oder Löschung dieser Daten.<br>
            Hierzu sowie zu weiteren Fragen zum Thema personenbezogene Daten können Sie sich jederzeit unter der im <a href="/impressum.php" class="slink">Impressum</a> angegebenen Adresse an uns wenden.
        </p>

        <h3>3. Datenerfassung auf unserer Website</h3>
        <h5 class="mb-1">Server-Log-Dateien</h5>
        <p class="mb-3">
            Der Provider der Seiten erhebt und speichert automatisch Informationen in so genannten Server-Log-Dateien, die lhr Browser automatisch an uns übermittelt. Dies sind:<br>
            <br>
            <li>Browsertyp und Browserversion</li>
            <li>Verwendetes Betriebssystem</li>
            <li>Referrer URL</li>
            <li>Hostname des zugreifenden Rechners</li>
            <li>Uhrzeit der Serveranfrage</li>
            <li>IP-Adresse</li>
            <br>
            <br>
            Eine Zusammenführung dieser Daten mit anderen Datenquellen wird nicht vorgenommen.
            <br>
            Grundlage für die Datenverarbeitung ist Art. 6 Abs. 1 lit, f DSGVO, der die Verarbeitung von Daten zur Erfüllung eines Vertrags oder vorvertraglicher Maßnahmen gestattet.
        </p>
    </div>
</div>
<?php require_once("templates/footer.php"); ?>