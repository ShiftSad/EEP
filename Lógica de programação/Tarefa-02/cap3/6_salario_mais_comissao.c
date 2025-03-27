#include <stdio.h>

int main() {
    float salary, sales;

    printf("Digite o salário fixo: ");
    scanf("%f", &salary);
    printf("Digite o total de vendas: ");
    scanf("%f", &sales);

    printf("Salário total: %.2f\n", salary + sales * 0.04);
}