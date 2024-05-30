using Microsoft.EntityFrameworkCore;
using VentaCupones.BC.Constantes;
using VentaCupones.BW.CU;
using VentaCupones.BW.Interfaces.BW;
using VentaCupones.BW.Interfaces.DA;
using VentaCupones.DA.Acciones;
using VentaCupones.DA.Contexto;

var builder = WebApplication.CreateBuilder(args);

// Add services to the container.

//conexion con base de datos
builder.Services.AddDbContext<ContextoVentaCupones>(options =>options.UseSqlServer(ConexionSQLServer.StringDeConexion));

builder.Services.AddControllers();
// Learn more about configuring Swagger/OpenAPI at https://aka.ms/aspnetcore/swashbuckle
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

//extencion para la comunicacion con api externa
builder.Services.AddHttpClient();

//Inyección de dependencias
builder.Services.AddTransient<IGestionarUsuariosBW, GestionarUsuariosBW>();
builder.Services.AddTransient<IGestionarUsuariosDA, GestionarUsuariosDA>();

builder.Services.AddTransient<IGestionarCompraBW, GestionarCompraBW>();
builder.Services.AddTransient<IGestionarCompraDA, GestionarCompraDA>();

builder.Services.AddTransient<IGestionarDetalleCompraBW, GestionarDetalleCompraBW>();
builder.Services.AddTransient<IGestionarDetalleCompraDA, GestionarDetalleCompraDA>();

var app = builder.Build();

//configuracion de cores
app.UseCors("AllowOrigin");
app.UseCors(options =>
{
    options.AllowAnyOrigin();
    options.AllowAnyMethod();
    options.AllowAnyHeader();
});

// Configure the HTTP request pipeline.
if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseHttpsRedirection();

app.UseAuthorization();

app.MapControllers();

app.Run();
