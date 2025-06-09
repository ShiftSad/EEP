#include <stdio.h>

double calcular_peso_ideal_pessoa(double altura, char sexo) {
    if (sexo == 'M' || sexo == 'm') {
        return (72.7 * altura) - 58.0;
    } else if (sexo == 'F' || sexo == 'f') {
        return (62.1 * altura) - 44.7;
    }
    return 0.0; // Sexo invalido
}

int main() {
    double alt;
    char sex;
    scanf("%lf %c", &alt, &sex);
    printf("%.2f\n", calcular_peso_ideal_pessoa(alt, sex));
    return 0;
}
