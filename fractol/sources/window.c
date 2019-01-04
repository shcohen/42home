/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   window.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/21 19:16:09 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/04 22:12:33 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

int		ft_create_window(t_all *all)
{
	all->mlx.y_size = 1080;
	all->mlx.x_size = 1920;
	all->mlx.mlx_ptr = mlx_init();
	all->mlx.win_ptr = mlx_new_window(all->mlx.mlx_ptr, all->mlx.x_size,
	all->mlx.y_size, "fract'ol");
	all->mlx.img_ptr = mlx_new_image(all->mlx.mlx_ptr, all->mlx.x_size,
	all->mlx.y_size);
	all->mlx.img_str = (int *)mlx_get_data_addr(all->mlx.img_ptr,
	&all->mlx.bpp, &all->mlx.s_l, &all->mlx.endian);
	mlx_put_image_to_window(all->mlx.mlx_ptr, all->mlx.win_ptr,
	all->mlx.img_ptr, 0, 0);
	return (0);
}

int		ft_check_fractal(char *str, t_all *all)
{
	if (ft_strcmp(str, "julia") == 0)
	{
		all->key.fractal = 1;
		return (1);
	}
	else if (ft_strcmp(str, "mandelbrot") == 0)
	{
		all->key.fractal = 2;
		return (1);
	}
	else if (ft_strcmp(str, "burning_ship") == 0)
	{
		all->key.fractal = 3;
		return (1);
	}
	return (-1);
}