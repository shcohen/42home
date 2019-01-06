/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   window.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/01/05 21:00:47 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/06 14:22:21 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

int		ft_create_window(t_all *all)
{
	all->mlx.height = 1080;
	all->mlx.width = 1920;
	all->mlx.mlx_ptr = mlx_init();
	all->mlx.win_ptr = mlx_new_window(all->mlx.mlx_ptr, all->mlx.width,
			all->mlx.height, "fract'ol");
	all->mlx.img_ptr = mlx_new_image(all->mlx.mlx_ptr, all->mlx.width,
			all->mlx.height);
	all->mlx.img_str = mlx_get_data_addr(all->mlx.img_ptr,
			&all->mlx.bpp, &all->mlx.size_line, &all->mlx.endian);
	return (0);
}

int		ft_check_fractals(char *str, t_all *all)
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
	else if (ft_strcmp(str, "burningship") == 0)
	{
		all->key.fractal = 3;
		return (1);
	}
	return (-1);
}
