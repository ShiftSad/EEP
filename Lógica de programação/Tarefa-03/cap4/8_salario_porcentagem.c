#include <stdio.h>

int main() {
    float salario;

    printf("Digite o salario: ");
    scanf("%f", &salario);

    if (salario <= 300) {
        salario *= 1.35; // Aumenta 35%
        printf("Novo salario: %.2f\n", salario);
    } 
    
    else if (salario > 300) {
        salario *= 1.15; // Aumenta 15%
        printf("Novo salario: %.2f\n", salario);
    }
}