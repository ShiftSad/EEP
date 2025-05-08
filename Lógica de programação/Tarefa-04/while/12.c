#include <stdio.h>

int main() {
    double employeeInitialSalary = 2000.0;
    double employeeCurrentSalary = employeeInitialSalary;
    double annualRaiseRate = 0.015;
    int calculationStartYear = 1996;
    int calculationEndYear = 2025;

    printf("Calculando salario anual a partir de %d ate %d:\n", calculationStartYear, calculationEndYear);

    for (int yearCounter = calculationStartYear; yearCounter <= calculationEndYear; yearCounter++) {
        employeeCurrentSalary = employeeCurrentSalary * (1.0 + annualRaiseRate);

        if (yearCounter >= 1997) {
            annualRaiseRate = annualRaiseRate * 2.0;
        }

        printf("Salario no final de %d: %.2f\n", yearCounter, employeeCurrentSalary);
    }

    printf("\nO salario atual (final de %d) do funcionario eh: %.2f\n", calculationEndYear, employeeCurrentSalary);
}
