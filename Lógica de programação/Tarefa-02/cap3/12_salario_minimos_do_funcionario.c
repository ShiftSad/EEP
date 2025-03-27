#include <stdio.h>

int main() {
    float salary, min_salary;

    printf("Digite o salário do funcionário: ");
    scanf("%f", &salary);
    printf("Digite o salário mínimo: ");
    scanf("%f", &min_salary);

    printf("Salários mínimos do funcionário: %.2f\n", salary / min_salary);
}