/* Navegação */

window.addEventListener("scroll", function(){
    var nav = document.querySelector("nav");
    nav.classList.toggle("sticky", window.scrollY > 100)
})

/* Botão */

function Mudarestado(el) {
  var display = document.getElementById(el).style.display;
  if (display == "none")
    document.getElementById(el).style.display = 'block';
  else
    document.getElementById(el).style.display = 'none';
}

/* Calculadora */

function id( el ) {
  return document.getElementById( el );
}

function margem( margem,) {
  return parseFloat(margem.replace('R$',"").replace('.',"").replace(',' , '.')) / 0.02636;
}

function valor( valor,) {
  return parseFloat(valor.replace('R$',"").replace('.',"").replace(',' , '.')) * 0.02636;
}

window.onload = function() {
  id('parcela').addEventListener('keyup', function() {
    var result = margem( this.value);
    id('result').value = String(result.toFixed(2)).formatMoney();
   
  });

  id('liberado').addEventListener('keyup', function() {
    var result = valor( this.value);
    id('resultado').value = String(result.toFixed(2)).formatMoney();
  });
}

String.prototype.formatMoney = function() {
  var v = this;

  if(v.indexOf('.') === -1) {
    v = v.replace(/([\d]+)/, "$1,00");
  }

  v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
  v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");
  v = v.replace(/([\d]+)([\d]{3}),([\d]{2})$/, "$1.$2,$3");

  return v;
};