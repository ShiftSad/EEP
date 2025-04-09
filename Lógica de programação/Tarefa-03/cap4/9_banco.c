#include <stdio.h>

int main() {
    float salarioMedio, credito;

    printf("Digite o salario medio: ");
    scanf("%f", &salarioMedio);

    if (salarioMedio > 400) {
        credito = salarioMedio * 0.3;
    } else if (salarioMedio > 300) {
        credito = salarioMedio * 0.25;
    } else if (salarioMedio > 200) {
        credito = salarioMedio * 0.2;
    } else {
        credito = salarioMedio * 0.1;
    }

    printf("Credito: %.2f\n", credito);
}