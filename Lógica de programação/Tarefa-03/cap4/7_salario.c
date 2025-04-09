#include <stdio.h>

int main() {
    float salario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario < 500) {
        salario *= 1.3; // Aumenta 30%
        printf("Novo salario: %.2f\n", salario);
    } else {
        printf("Salario invalido.\n");
    }
}