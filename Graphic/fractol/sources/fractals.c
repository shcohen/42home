/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fractals.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/01/05 20:26:16 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/06 14:22:56 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

void	ft_init_fractal(t_all *all)
{
	if (all->key.fractal == 1)
		ft_init_julia(all);
	if (all->key.fractal == 2)
		ft_init_mandelbrot(all);
	else if (all->key.fractal == 3)
		ft_init_burning_ship(all);
}

void	ft_choose_fractal(t_all *all)
{
	mlx_hook(all->mlx.win_ptr, 2, 2, ft_keycode, all);
	mlx_hook(all->mlx.win_ptr, 6, 3, ft_motion_hook, all);
	mlx_mouse_hook(all->mlx.win_ptr, ft_mousehook, all);
	if (all->key.fractal == 1)
		ft_julia(all);
	else if (all->key.fractal == 2)
		ft_mandelbrot(all);
	else if (all->key.fractal == 3)
		ft_burning_ship(all);
}

void	ft_init_julia(t_all *all)
{
	all->fra.x1 = -1;
	all->fra.x2 = 1;
	all->fra.y1 = -1.2;
	all->fra.y2 = 1.2;
	all->fra.c_r = -0.8;
	all->fra.c_i = 0.156;
	all->fra.max_iter = 150;
	all->key.color_r = 45;
	all->key.color_g = 7;
	all->key.color_b = 45;
	all->key.mouse = 0;
	all->key.click = 0;
}

void	ft_init_mandelbrot(t_all *all)
{
	all->fra.x1 = -2.1;
	all->fra.x2 = 0.6;
	all->fra.y1 = -1.2;
	all->fra.y2 = 1.2;
	all->fra.max_iter = 50;
	all->key.color_r = 15;
	all->key.color_g = 20;
	all->key.color_b = 45;
	all->key.mouse = 0;
	all->key.click = 0;
}

void	ft_init_burning_ship(t_all *all)
{
	all->fra.x1 = -2;
	all->fra.x2 = 1;
	all->fra.y1 = -2;
	all->fra.y2 = 1.2;
	all->fra.max_iter = 50;
	all->key.color_r = 65;
	all->key.color_g = 10;
	all->key.color_b = 45;
	all->key.mouse = 0;
	all->key.click = 0;
}
