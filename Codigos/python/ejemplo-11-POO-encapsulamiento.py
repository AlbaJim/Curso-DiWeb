""" 
ejemplo-11-POO-encapsulamiento

Novedades:

"""

class Camion:
    # Constructor donde declaramos los atributos
    def __init__(self) -> None:
        self.modelo = input("Dame Modelo camión: ")
        
        # Atributo privado 
        self.__potencia = int(input("Dame Potencia: "))
        
        electrico = input("¿es electrico? (si|no): ")
        self.electrico = True if electrico == "si" else False
        
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
        
miCamion = Camion()     # Usamos el constructor
print(miCamion)
print(f" La potencia del Camión es: {miCamion.potencia}")