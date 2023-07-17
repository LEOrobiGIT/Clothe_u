<div class = "container8">
    <form id = "form" action="https://formsubmit.co/94ceadf230db037ad8dbf277dd46bf48" method="post"> 
        <h1>Contattaci</h1> 
        <label for="nome">Nome:</label> 
        <input type="text" name="nome" id="nome" required><br>

        <label for="cognome">Cognome:</label>
        <input type="text" name="cognome" id="cognome" required><br>

        <label for="telefono">Telefono:</label>
        <input type="tel" name="telefono" id="telefono" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="descrizione">Descrizione:</label><br>
        <textarea name="descrizione" id="descrizione" cols="30" rows="5" required></textarea><br>

        <input id = "invia" type="submit" value="Invia">
    </form>
    <div class= "domande">
        <div class= "insieme">
            <button id ="domanda1" class = "domanda">Quali sono i costi di spedizione?</button>
            <button id ="domanda2" class = "domanda">Come faccio a restituire il prodotto?</button>
            <button id ="domanda3" class = "domanda">Cosa succedere se danneggio il prodotto?</button>
            <button id ="domanda4" class = "domanda">Cosa succede se sbaglio la taglia?</button>
        </div>
            <hr/>
            <div id="zonaDinamica">
            Seleziona la domanda
            </div>
            
            <script>
                //ajax per far comparire nell'elemento il testo dei file txt Domanda_*
                document.getElementById("domanda1").addEventListener("click", function(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("zonaDinamica").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "Domanda_1.txt", true);
                xhttp.send();
                });
            </script>
            <script>
                document.getElementById("domanda2").addEventListener("click", function(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("zonaDinamica").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "Domanda_2.txt", true);
                xhttp.send();
                });
            </script>
            <script>
                document.getElementById("domanda3").addEventListener("click", function(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("zonaDinamica").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "Domanda_3.txt", true);
                xhttp.send();
                });
            </script>
            <script>
                document.getElementById("domanda4").addEventListener("click", function(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("zonaDinamica").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "Domanda_4.txt", true);
                xhttp.send();
                });
            </script>
            
        </div>
    </div>

<style>
.container8 {
    display: flex;
    margin-top: 50px;
    margin-left: 80px;
    margin-right: 80px;
    gap: 100px;
    /* width: 100%; */
    justify-content: space-between;
}
form#form {
    width: 70%;
}

label { 
    display: block; 
    margin-top: 10px; 
    font-weight: bold; 
} 
input, textarea {
    width: 100%;
    padding: 5px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    display: flex;
}
.domande {
    width: 40%;
    display: flex;
    flex-direction: column;
}
.domanda {
    width: 100%;
    background-color: #efac32;
    border-radius: 10px;
}
.domanda:hover {
    background-color: #805b30;
}
div#zonaDinamica {
    height: 100%;
    font-size: 1.7rem;
    border: 1px solid #797979;
    padding: 15px;
    margin-top: 10px;
    border-radius: 20px;
}
    textarea { 
        height: 100px; 
    } 
    button { 
        background-color: #4CAF50; 
        color: white; 
        border: none; 
        padding: 10px 20px; 
        text-align: center;
        margin-top: 10px; 
        margin-bottom: 10px; 
        text-decoration: none; 
        display: inline-block; 
        font-size: 16px; 
        cursor: pointer; 
        border-radius: 4px; 
    } 
    button:hover {
        background-color: #45a049; 
    } 
    .form { 
        margin: 20px auto; 
        width: 80%; 
        max-width: 600px; 
        background-color: #f2f2f2; 
        padding: 20px; 
        border-radius: 4px; 
        box-sizing: border-box; 
        box-shadow: 0px 0px 10px #ccc; 
    } 
    h1 {
    font-size: 3rem;
}
input#invia {
    justify-content: center;
}
@media(max-width:768px){
    input, textarea {
    }
    #form {
    /* width: 500px; */
    /* width: 100%; */
    /* margin-right: 50px; */
    width: 400px;
}
}
</style>