""" 
ejemplo-13-POO-estaticos

Novedades:
- Herencia
"""

class Camion:
    # Constructor donde declaramos los atributos
    def __init__(self, modelo, potencia, electrico) -> None:
        self.modelo = modelo
        # Atributo privado 
        self.__potencia = potencia
        self.electrico = electrico
        
    # Getter y Setter (OJO!, siempre en es este orden)
    @property
    def potencia (self):
        return self.__potencia
    
    @potencia.setter
    def potencia (self, potencia):
        if potencia > 0:
            self.__potencia = potencia
    
    # El toString
    def __str__(self) -> str:
        return (f"Datos Camión: \n"
                f"Modelo: {self.modelo} \n"
                f"Potencia: {self.__potencia} CV \n"
                f"Eléctrico: {'Sí' if self.electrico else 'No'}")

# Herencia
class TrenCarretera(Camion):
    #Atributos dentro del constructor con parámetros
    def __init__(self, modelo, potencia, electrico, remolque, peso) -> None:
        # Constructor del padre
        super().__init__(modelo, potencia, electrico)
        # Atributos propios
        self.remolque = remolque
        self.peso = peso
    
    # Creo un método llamado leeTren ESTÁTICO!
    @staticmethod
    def leeTren():
        # OJO, no es self.<atributo>, son variables normales
        modelo = input("Dame Modelo camión: ")
        potencia = int(input("Dame Potencia: "))
        electrico = input("¿es electrico? (si|no): ")
        electrico = True if electrico == "si" else False
        remolque = input("¿Tiene remolque? (si|no): ")
        remolque = True if remolque == "si" else False
        
        # Hacemos el tren
        tren = TrenCarretera(modelo, potencia, electrico, remolque, 5000)
        tren.modelo = modelo
        tren.potencia = potencia        # Usamos el setter!!
        tren.electrico = electrico
        return tren
        
    # El toString
    def __str__(self) -> str:
        return (f"Datos Tren Carretera: \n"
                f"{super().__str__()} \n"
                f"Remolque: {'Sí' if self.remolque else 'No'} \n"
                f"Peso: { self.peso } \n")

# Script principal
# miCamion = Camion()     # Usamos el constructor
# print(miCamion)

# miTren = TrenCarretera()
#miTren.leeTren()

miTren = TrenCarretera.leeTren()
print(miTren)

# print(f" La potencia del Camión es: {miCamion.potencia}")


