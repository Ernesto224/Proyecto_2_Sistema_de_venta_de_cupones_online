using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using VentaCupones.BC.Modelos;
using VentaCupones.DA.Entidades;

namespace VentaCupones.DA.Contexto
{
    public class ContextoVentaCupones : DbContext
    {
        public ContextoVentaCupones(DbContextOptions dbContextOptions) : base(dbContextOptions) { }

        public DbSet<UsuarioClienteDA> usuarioClientes { get; set; }

        public DbSet<CompraDA> compras { get; set; }

        public DbSet<DetallesCompraDA> detallesCompras { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);

            modelBuilder.Entity<UsuarioClienteDA>()
            .HasKey(u => u.IDCliente);

            modelBuilder.Entity<CompraDA>()
            .HasMany(c => c.DetallesCompras)
            .WithOne()
            .HasForeignKey(d => d.IDCompra);
        }

    }
}
