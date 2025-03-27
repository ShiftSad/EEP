#include <stdio.h>

int main() {
    float side1, side2;

    printf("Digite o lado 1: ");
    scanf("%f", &side1);
    printf("Digite o lado 2: ");
    scanf("%f", &side2);

    printf("Hipotenusa: %.2f\n", sqrt(side1 * side1 + side2 * side2));
}