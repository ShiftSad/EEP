#include <stdio.h>

int main() {
    float base1, base2, height;

    printf("Digite a base maior: ");
    scanf("%f", &base1);
    printf("Digite a base menor: ");
    scanf("%f", &base2);
    printf("Digite a altura: ");
    scanf("%f", &height);

    printf("Área do trapézio: %.2f\n", (base1 + base2) * height / 2);
}