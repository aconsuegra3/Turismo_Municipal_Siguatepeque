function preguntar(id) {
  if (
    confirm(
      "¿Estás seguro que desea eliminar?\nEsta acción no se puede revertir"
    )
  ) {
    window.location.href = "alojamiento.php?del=" + id;
  }
}
