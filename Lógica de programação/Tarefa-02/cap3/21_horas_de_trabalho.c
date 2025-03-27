#include <stdio.h>

int main() {
    float worked_hours, minimum_wage, extra_hours;

    // worked hour = 1/8 minimum wage
    // extra hour = 1/4 minimum wage
    printf("Digite as horas trabalhadas: ");
    scanf("%f", &worked_hours);
    printf("Digite o salário mínimo: ");
    scanf("%f", &minimum_wage);
    printf("Digite as horas extras: ");
    scanf("%f", &extra_hours);

    float salary = (worked_hours * minimum_wage) * 1/8 + (extra_hours * minimum_wage) * 1/4;
    printf("Salário: %.2f\n", salary);
}