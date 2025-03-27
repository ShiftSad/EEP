#include <stdio.h>

int main() {
    float weight;

    printf("Digite o peso: ");
    scanf("%f", &weight);

    printf("Emagrecer: %.2f\n", weight * 0.8);
    printf("Engordar: %.2f\n", weight * 1.15);
}