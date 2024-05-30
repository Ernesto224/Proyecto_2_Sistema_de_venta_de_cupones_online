namespace VentaCupones.API.DTOs
{
    public class UsuarioClienteRegistroDTO
    {
        public string Nombre { get; set; }

        public string Apellidos { get; set; }

        public string CedulaDeIdentidad { get; set; }

        public DateTime FechaDeNacimiento { get; set; }

        public string CorreoElectronico { get; set; }

        public string Contrasenia { get; set; }
    }
}
