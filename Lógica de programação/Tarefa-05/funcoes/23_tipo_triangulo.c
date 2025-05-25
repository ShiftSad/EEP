#include <stdio.h>
#include <stdbool.h>
#include <math.h> 

bool eh_triangulo(double a, double b, double c) {
    return (a > 0 && b > 0 && c > 0 &&
            a < b + c && b < a + c && c < a + b);
}

const char* classificar_triangulo(double a, double b, double c) {
    if (a == b && b == c) {
        return "Equilatero";
    } else if (a == b || a == c || b == c) {
        return "Isosceles";
    } else {
        return "Escaleno";
    }
}

int main() {
    double l1, l2, l3;
    scanf("%lf %lf %lf", &l1, &l2, &l3);
    if (eh_triangulo(l1, l2, l3)) {
        printf("%s\n", classificar_triangulo(l1, l2, l3));
    } else {
        printf("Nao forma triangulo\n");
    }
    return 0;
}
