using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using VentaCupones.BC.Modelos;

namespace VentaCupones.BC.ReglasDeNegocio
{
    public static class UsuarioEsValido
    {
        public static bool ValidarNombre(string nombre)
        {
            // Verifica que el nombre no sea nulo o vacío y que tenga una longitud menor o igual a 11 caracteres
            return !string.IsNullOrEmpty(nombre) && nombre.Length <= 11;
        }

        public static bool ValidarApellidos(string apellidos)
        {
            // Verifica que los apellidos no sean nulos o vacíos y que tengan una longitud menor o igual a 30 caracteres
            return !string.IsNullOrEmpty(apellidos) && apellidos.Length <= 30;
        }

        public static bool ValidarCedulaDeIdentidad(string cedulaDeIdentidad)
        {
            // Verifica que la cédula de identidad cumpla con el patrón 00-0000-0000
            string pattern = @"^\d{2}-\d{4}-\d{4}$";
            return Regex.IsMatch(cedulaDeIdentidad, pattern);
        }

        public static bool ValidarFechaDeNacimiento(DateTime fechaDeNacimiento)
        {
            // Asume que la fecha está en el formato correcto, ya que DateTime no guarda formato
            // Si necesitas validar la entrada del formato, lo haces con el parseo de string a DateTime
            return true;
        }

        public static bool ValidarCorreoElectronico(string correoElectronico)
        {
            // Verifica que el correo electrónico cumpla con el patrón básico de un correo
            string pattern = @"^[^@\s]+@[^@\s]+\.[^@\s]+$";
            return Regex.IsMatch(correoElectronico, pattern);
        }

        public static bool ValidarContrasenia(string contrasenia)
        {
            // Verifica que la contraseña tenga al menos 8 caracteres y cumpla con las reglas de variedad de caracteres
            if (contrasenia.Length < 8)
                return false;

            bool tieneMayuscula = false;
            bool tieneMinuscula = false;
            bool tieneNumero = false;
            bool tieneCaracterEspecial = false;

            foreach (char c in contrasenia)
            {
                if (char.IsUpper(c)) tieneMayuscula = true;
                else if (char.IsLower(c)) tieneMinuscula = true;
                else if (char.IsDigit(c)) tieneNumero = true;
                else if (!char.IsLetterOrDigit(c)) tieneCaracterEspecial = true;
            }

            return tieneMayuscula && tieneMinuscula && tieneNumero && tieneCaracterEspecial;
        }

        public static bool ValidarUsuarioCliente(UsuarioCliente usuario)
        {
            // Valida todas las propiedades del objeto UsuarioCliente utilizando los métodos anteriores
            return ValidarNombre(usuario.Nombre) &&
                   ValidarApellidos(usuario.Apellidos) &&
                   ValidarCedulaDeIdentidad(usuario.CedulaDeIdentidad) &&
                   ValidarCorreoElectronico(usuario.CorreoElectronico) &&
                   ValidarContrasenia(usuario.Contrasenia);
        }
    }
}
