# secondo-compito.PHP
Secondo compito da svolgere (PHP)

Il sito è un sito per acquistare, biglietti di calcio, abbonamenti di diverse squadre e partite in streaming, abbiamo preso spunto dall esercizio proposto nelle Slides-parte6 (PHP-13), sono presenti 13 file.  Il sito offre la possibilita di acquistare, biglietti di alcune partite di calcio di diverse competizioni, abbonamenti di alcune squadre e partite in streaming.

File presenti:

creazione.db.php : crea e popola il database LWtdb usato, vengono create 3 tabelle(utenti, biglietti, abbonamenti, partite in streaming) con i rispettivi attributi.

connessione.php : effettua la connessione al database

menu.php: prevede diverse scelte ed ognuna è collegata ad un link, acquisto dei biglietti, acquisto abbonamento, acquisto partite in streaming, 
elimina oggetti inseriti nel carrello, paga i prodotti, logout

stile.php: regole di stile usate nei file login logout e menu), mysql.biglietti.php(per acquistare biglietti delle partite)

mysql.abbonamenti.php: per acquistare abbonamenti delle squadre

mysql.streaming.php: per acquistare biglietti delle partite in streaming p.es dazn o sky

login.php: accesso al sito con nome(utente1) e password(utente1)

inizio.php: presentazione del menu 

logout.php: uscita dal sito con possibilità di rientrare

elimina.php: per eliminare i prodotti inseriti nel carrello durante gli acquisti

paga.php / pagamenti.php: pagamento dei prodotti inseriti nel carrello, e comunicazione spesa totale effettuata dall utente in quella sessione 


I biglietti sono caratterizzati dai seguenti attributi: partita, data, competizione, prezzo. Gli abbonamenti sono caratterizzati dai seguenti attributi: squadra, posto assegnato, classe (A,B,C) e prezzo, la classe indica i privilegi dell abbonamento per esempio la classe A è la piu importante quindi ha un costo maggiore rispetto alla classe C che è la meno importante ed è quindi la piu economica. Le partite in streaming sono caratterizzaei dai seguenti attributi: partita, data, piattaforma(Sky/Dazn), prezzo.


Indirizzo del repository GitHub: https://github.com/luigirispoli/secondo-compito.PHP.git
Gruppo formato da: Luig Rispoli ; Luca Pettisano
