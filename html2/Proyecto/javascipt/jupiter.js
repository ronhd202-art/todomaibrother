<script>
  const termometro = document.getElementById("termometro");
  const liquido = document.getElementById("liquido");
  const valor = document.getElementById("valor");

  termometro.addEventListener("mousemove", e => {
    const rect = termometro.getBoundingClientRect();
    const y = rect.bottom - e.clientY;
    let porcentaje = (y / rect.height) * 100;

    porcentaje = Math.max(0, Math.min(100, porcentaje));

    const temperatura = (porcentaje * 30 / 100).toFixed(1);

    liquido.style.height = porcentaje + "%";
    valor.textContent = temperatura + " °C";
  });
</script>