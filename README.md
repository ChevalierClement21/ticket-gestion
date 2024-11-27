# ticket-gestion
 
Créer une application avec Laravel permettant de gérer les tickets d'incidents des clients

Pour cela, voici un déroulé type d'interaction

✅Le client se connecte à l'application, il peut voir ses tickets et les gérer et il peut créer un nouveau ticket.
✅Lorsque qu'un ticket est créé, les administrateurs sont notifiés par mail
✅Lorsque qu'un ticket est créé, le développeur en charge du ticket est notifié
✅La saisie d'un ticket implique de renseigner a minima un titre, un texte explicatif, une catégorie et un priorité. Le statut est alors positionné à "Ouvert". Une pièce jointe pourra être transmise si besoin.

✅L'administrateur se connecte à l'application et peut voir l'ensemble des tickets, leur état et les affecter à un développeur.
✅Lorsqu'un ticket est affecté à un développeur celui-ci est notifié par mail et le ticket passe au statut "Affecté"

✅Le développeur se connecte à l'application et peut voir l'ensemble des tickets qui lui sont affectés et non résolus.
✅Le développeur peut ajouter un commentaire à un ticket, le client est alors notifié par mail.
✅Plusieurs échange entre le client et le développeur peuvent intervenir avec à chaque la mise en place d'un commentaire 
❌et une pièce jointe de manière facultative.

✅Le client une fois le ticket résolu peut passer le ticket au statut "Terminé". Il a aussi la possibilité de l'annuler, le ticket passera au statut "Annulé"
