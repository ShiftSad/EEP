#include <stdio.h>

int main() {
    float radius;

    printf("Digite o raio: ");
    scanf("%f", &radius);

    printf("Circunferência do círculo: %.2f\n", 2 * 3.14 * radius);
    printf("Área da esfera: %.2f\n", 4 * 3.14 * radius * radius);
    printf("Volume da esfera: %.2f\n", 4 / 3 * 3.14 * radius * radius * radius);
}