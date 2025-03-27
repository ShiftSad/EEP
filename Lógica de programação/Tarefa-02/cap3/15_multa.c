#include <stdio.h>

int main() {
    float salary, fine;

    printf("Digite o salário: ");
    scanf("%f", &salary);
    printf("Digite a multa: ");
    scanf("%f", &fine);

    printf("Salário com multa: %.2f\n", salary - (fine * 2) * 0.02);
}