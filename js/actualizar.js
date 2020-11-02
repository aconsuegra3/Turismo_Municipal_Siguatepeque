function actualizar(id) {
  if (
    confirm(
      "¿Estás seguro que desea actualizar?\nEsta acción no se puede revertir"
    )
  ) {
    window.location.href = "actualizar_alojamiento.php?act=" + id;
  }
}
