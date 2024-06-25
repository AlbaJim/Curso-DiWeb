""" 
ejemplo-10-POO-clases
"""

class Camion:
    # Constructor donde declaramos los atributos
    def __init__(self) -> None:
        self.modelo = input("Dame Modelo camión: ")
        self.potencia = int(input("Dame Potencia: "))
        electrico = input("¿es electrico? (si|no): ")
        self.electrico = True if electrico == "si" else False
        
    # El toString
    def __str__(self) -> str:
        return (f"Datos Camión: \n"
                f"Modelo: {self.modelo} \n"
                f"Potencia: {self.potencia} CV \n"
                f"Eléctrico: {'Sí' if self.electrico else 'No'}")
        
miCamion = Camion()
print(miCamion)