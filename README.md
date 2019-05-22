Deze versie ondersteunt inloggen, registreren en uitloggen.

Authenticatie is met JWT en de token wordt met een http only cookie naar de client gestuurd.

De routes om al je devices te zien, er één te zien of om confirmatie te bevestigen of te weigeren zijn beschermd met JWT.
Deze acties zijn enkel mogelijk op je eigen devices, dit wordt gecontroleerd.
Een request die om één of andere reden faalt wordt beantwoord met een passende responsecode en error message.

Er is CORS middleware geïmporteerd om alle requests toe te staan naar deze API. De toegestane origins kunnen in de config aangepast worden, maar momenteel is alles toegestaan.

De database folder bevat de migrations voor alle tabellen voor de database, deze migraties werden op Combell gebruikt voor de online database die ook gebruikt wordt door de NodeJS API met de Native Mobile App.

Deze versie wordt op Combell gehost. De PWA die deze Laravel backend gebruikt, kan je online zien via arnedierickx.be